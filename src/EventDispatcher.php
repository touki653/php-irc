<?php

namespace Touki\IRC;

/**
 * Event dispatcher
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class EventDispatcher
{
    protected $events = array();

    /**
     * Adds a listener
     *
     * @param string   $name     Event name
     * @param callable $callable Callable listener
     */
    public function addListener($name, $callable)
    {
        if (!is_callable($callable)) {
            throw new \InvalidArgumentException(sprintf("Expected callable for addListener, got %s", gettype($callable)));
        }

        if (!isset($this->events[$name])) {
            $this->events[$name] = array();
        }

        $this->events[$name][] = $callable;
    }

    /**
     * Dispatches an event
     *
     * @param string $name  Event name
     * @param mixed  $event Event object
     */
    public function dispatch($name, Event $event)
    {
        if (!isset($this->events[$name])) {
            return;
        }

        foreach ($this->events[$name] as $callable) {
            call_user_func_array($callable, array($event, $this));

            if (true === $event->isPropagationStopped()) {
                break;
            }
        }
    }
}
