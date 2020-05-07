<?php

declare(strict_types = 1);

namespace Infinityloop\GenericDropdown;

final class GenericDropdown extends \Nette\Application\UI\Control
{
    private string $defaultValue;
    private array $dropdownValues = [];
    private $callback;

    public function render() : void
    {
        $this->template->setFile(__DIR__ . '/GenericDropdown.latte');
        $this->template->render();
    }

    public function setDropdownValues(array $dropdownValues) : GenericDropdown
    {
        $this->dropdownValues = $dropdownValues;

        return $this;
    }

    public function setCallback(callable $callback) : GenericDropdown
    {
        $this->callback = $callback;

        return $this;
    }

    public function setDefaultValue(string $defaultValue) : GenericDropdown
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    public function formSuccess(\Nette\Application\UI\Form $form, $values) : void
    {
        $newValue = $values['genericDropdown'];

        if (\is_callable($this->callback)) {
            $success = \call_user_func($this->callback, $newValue) ?? true;
            $form->reset();
            $form->setDefaults(['genericDropdown' => ($success ? $newValue : $this->defaultValue)], true);
        }

        $this->redrawControl('genericDropDownSnippet');
    }

    protected function createComponentForm() : \Nette\Application\UI\Form
    {
        $form = new \Nette\Application\UI\Form();
        $form->addProtection();

        $form->addSelect('genericDropdown', null, $this->dropdownValues)
            ->setDefaultValue($this->defaultValue);

        $form->onSuccess[] = [$this, 'formSuccess'];

        return $form;
    }
}
