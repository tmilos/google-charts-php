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

class Row implements \JsonSerializable
{
    /** @var Cell[] */
    private $cells = [];

    /**
     * @param array $cells
     */
    private function __construct(array $cells = [])
    {
        foreach ($cells as $cell) {
            if (!$cell instanceof Cell) {
                $cell = new Cell($cell);
            }
            $this->addCell($cell);
        }
    }

    /**
     * @param array $cells
     *
     * @return Row
     */
    public static function create(array $cells = [])
    {
        return new static($cells);
    }

    /**
     * @param Cell $cell
     *
     * @return Row
     */
    public function addCell(Cell $cell)
    {
        $this->cells[] = $cell;

        return $this;
    }

    public function toArray()
    {
        $result = ['c' => []];
        foreach ($this->cells as $cell) {
            $result['c'][] = $cell->toArray();
        }

        return $result;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
