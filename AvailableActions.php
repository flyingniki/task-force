<?php

class AvailableActions
{
    const STATUS_NEW = 'new';
    const STATUS_CANCELED = 'canceled';
    const STATUS_IN_PROCESS = 'proceed';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';

    const ACTION_CANCEL = 'actionCancel';
    const ACTION_RESPOND = 'actionProceed';
    const ACTION_COMPLETE = 'actionComplete';
    const ACTION_DENY = 'actionDeny';

    private $executorId;
    private $customerId;
    private $status;

    public function __construct($status, $executorId, $customerId)
    {
        $this->setStatus($status);
        $this->executorId = $executorId;
        $this->customerId = $customerId;
    }

    public function getStatusMap()
    {
        return [
            self::STATUS_NEW => 'Новое',
            self::STATUS_CANCELED => 'Отменено',
            self::STATUS_IN_PROCESS => 'В работе',
            self::STATUS_COMPLETED => 'Выполнено',
            self::STATUS_FAILED => 'Провалено',
        ];
    }

    public function getActionMap()
    {
        return [
            self::ACTION_CANCEL => 'Отменить',
            self::ACTION_RESPOND => 'Откликнуться',
            self::ACTION_COMPLETE => 'Выполнено',
            self::ACTION_DENY => 'Отказаться',
        ];
    }

    public function getNextStatus()
    {
        return [
            self::ACTION_CANCEL => self::STATUS_CANCELED,
            self::ACTION_RESPOND => self::STATUS_IN_PROCESS,
            self::ACTION_COMPLETE => self::STATUS_COMPLETED,
            self::ACTION_DENY => self::STATUS_FAILED
        ];
    }

    public function getAvailableActions($status)
    {
        $map = [
            self::STATUS_NEW => [self::ACTION_CANCEL, self::ACTION_RESPOND],
            self::STATUS_IN_PROCESS => [self::ACTION_COMPLETE, self::ACTION_DENY]
        ];
        return $map[$status] ?? null;
    }

    public function setStatus($status)
    {
        $availableStatuses = [
            self::STATUS_NEW,
            self::STATUS_CANCELED,
            self::STATUS_IN_PROCESS,
            self::STATUS_COMPLETED,
            self::STATUS_FAILED
        ];

        if (in_array($status, $availableStatuses)) {
            return $this->status = $status;
        }
    }
}
