<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\HydratorInterface;

class RegistrationMapper extends Registration implements HydratorInterface
{

    protected $dbAdapter;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function mapToArray(Registration $object)
    {
        $attendeeMapper = new AttendeeMapper();
        $attendees = array();
        foreach ($object->attendees as $attendee) {
            $attendees[] = $attendeeMapper->mapToArray($attendee);
        }

        return array(
            'id' => $object->id,
            'event_id' => $object->event->getId(),
            'first_name' => $object->firstName,
            'last_name' => $object->lastName,
            'registration_time' => $object->dateTime,
            'attendees' => $attendees
        );
    }

    public function mapToEntity($data, $entity)
    {
        /** @var $entity Registration */
        $entity->id = $data['id'];
        $entity->firstName = $data['first_name'];
        $entity->lastName = $data['last_name'];
        $entity->dateTime = $data['registration_time'];

        $dbAdapter = $this->dbAdapter;

        // lazy load event if requested
        $entity->event = function () use ($dbAdapter, $data) {
            $eventTable = new TableGateway('event', $dbAdapter);
            $rows = $eventTable->select(array('id = ?' => $data['event_id']));
            $eventMapper = new EventMapper;
            return $eventMapper->hydrate($rows->current(), new Event);
        };

        // lazy load attendees when requested
        $entity->attendees = function () use ($dbAdapter, $data) {
            $attendeeTable = new TableGateway('attendee', $dbAdapter);
            $rows = $attendeeTable->select(array('registration_id = ?' => $data['id']));
            $attendeeMapper = new AttendeeMapper;
            $attendees = array();
            foreach ($rows as $row) {
                $attendee = new Attendee;
                $attendeeMapper->mapToEntity($row->getArrayCopy(), $attendee);
                $attendees[] = $attendee;
            }
            return $attendees;
        };
    }

    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     */
    public function extract($object)
    {
        return $this->mapToArray($object);
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        $this->mapToEntity($data, $object);
        return $object;
    }
}
