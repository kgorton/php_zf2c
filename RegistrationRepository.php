<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Expression;
use Zend\Db\TableGateway\TableGateway;


class RegistrationRepository
{
    protected $dbAdapter;
    protected $tableGateway;
    protected $mapper;
    protected $hydrator;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->mapper = new RegistrationMapper($dbAdapter);

        $this->hydrator = new HydratingResultSet(
            $this->mapper,
            new Registration
        );

        $this->tableGateway = new TableGateway(
            'registration',
            $dbAdapter,
            null,
            $this->hydrator
        );
    }

    public function findAllForEvent($eventId)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where(array('event_id' => $eventId));
        $registrations = $this->tableGateway->selectWith($select);
        return $registrations;
    }

    public function findById($id)
    {
        $rows = $this->tableGateway->select(array('id' => $id));
        if (!$rows) {
            return false;
        }
        $row = $rows->current();
        return $row;
    }

    public function persist(Registration $registration)
    {
        $regData = $this->mapper->mapToArray($registration);

        $attendeesData = $regData['attendees'];
        unset($regData['attendees']);

        if ($regData['registration_time'] == '') {
            $regData['registration_time'] = new Expression('NOW()');
        }

        $this->tableGateway->insert($regData);
        $regId = $this->tableGateway->getLastInsertValue();

        $attendeeTable = new TableGateway('attendee', $this->dbAdapter);
        foreach ($attendeesData as $attendeeData) {
            $attendeeData['registration_id'] = $regId;
            $attendeeTable->insert($attendeeData);
        }

        return $this->findById($regId);
    }

}