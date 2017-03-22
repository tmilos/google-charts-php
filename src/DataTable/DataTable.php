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

class DataTable implements \JsonSerializable
{
    /** @var Column[] */
    private $columns = [];

    /** @var Row[] */
    private $rows = [];

    /**
     * @param Column[] $columns
     */
    public function __construct(array $columns = [])
    {
        foreach ($columns as $column) {
            $this->addColumn($column);
        }
    }

    /**
     * @param Column $column
     *
     * @return DataTable
     */
    public function addColumn(Column $column)
    {
        $this->columns[] = $column;

        return $this;
    }

    /**
     * @param Row $row
     *
     * @return DataTable
     */
    public function addRow(Row $row)
    {
        $this->rows[] = $row;

        return $this;
    }

    /**
     * @param array $rowCells
     *
     * @return DataTable
     */
    public function addRowAsArray(array $rowCells)
    {
        $this->addRow(Row::create($rowCells));

        return $this;
    }

    /**
     * @param array $data
     *
     * @return DataTable
     */
    public function addRows(array $data)
    {
        foreach ($data as $row) {
            if ($row instanceof Row) {
                $this->addRow($row);
            } elseif (is_array($row)) {
                $this->addRowAsArray($row);
            } else {
                throw new \InvalidArgumentException('Expected Row or array');
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = ['cols' => [], 'rows' => []];

        foreach ($this->columns as $column) {
            $result['cols'][] = $column->toArray();
        }
        foreach ($this->rows as $row) {
            $result['rows'][] = $row->toArray();
        }

        return $result;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
