<?php // src/Acme/TaskBundle/Entity/Task.php
namespace Adeti\TaskBundle\Entity;

class Task
{
 /**
     * @Assert\NotBlank()
     */
    public $task;
 /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dueDate;

    public function getTask()
    {
        return $this->task;
    }
    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('task', new NotBlank());

        $metadata->addPropertyConstraint('dueDate', new NotBlank());
        $metadata->addPropertyConstraint(
            'dueDate',
            new Type('\DateTime')
        );
    }
}
