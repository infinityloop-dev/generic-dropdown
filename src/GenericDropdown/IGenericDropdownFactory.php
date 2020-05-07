<?php

declare(strict_types = 1);

namespace Infinityloop\GenericDropdown;

interface IGenericDropdownFactory
{
    public function create() : \Infinityloop\GenericDropdown\GenericDropdown;
}
