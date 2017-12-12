<?php

/*
 * This file is part of the tmilos/google-charts package.
 *
 * (c) Milos Tomic <tmilos@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tmilos\GoogleCharts\DataTable;

class Column implements \JsonSerializable
{
    /** @var ColumnType */
    private $type;

    /** @var string */
    private $id;

    /** @var string */
    private $label;

    /** @var string */
    private $pattern;

    /** @var string */
    private $role;

    /**
     * @param ColumnType $type
     */
    private function __construct(ColumnType $type)
    {
        $this->type = $type;
    }

    /**
     * @param ColumnType $type
     *
     * @return Column
     */
    public static function create(ColumnType $type)
    {
        return new static($type);
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param ColumnType $type
     *
     * @return Column
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string $label
     *
     * @return Column
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @param string $pattern
     *
     * @return Column
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * @param string $role
     *
     * @return Column
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [
            'type' => $this->type->getValue(),
        ];
        if ($this->id) {
            $result['id'] = $this->id;
        }
        if ($this->label) {
            $result['label'] = $this->label;
        }
        if ($this->pattern) {
            $result['pattern'] = $this->pattern;
        }
        if ($this->role) {
            $result['role'] = $this->role;
        }

        return $result;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
