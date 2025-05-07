<?php

class TasksLogicHooks
{

    public function create_task_by_account($accountBean, $event, $arguments): void
    {
        if ($accountBean->source !== 'site')
            return;

        $accountBean->load_relationship('tasks');
        if ($accountBean->tasks->get())
            return;

        try {
            // create task bean by accountBean
            $tasksBean = BeanFactory::getBean('Tasks');
            $tasksBean->name = 'Я мега крут';
            $tasksBean->save();

            $accountBean->tasks->add($tasksBean);
        }
        catch(\Exception $e) {
            $errorMessage = 'Error while create tasks for account: ' . $e->getMessage();
            LoggerManager::getLogger()->error($errorMessage);
        }
    }
    
}