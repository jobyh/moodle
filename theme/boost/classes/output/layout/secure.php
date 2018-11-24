<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   theme_boost
 * @copyright 2016 Damyon Wiese
 * @copyright 2018 Joby Harding
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_boost\output\layout;

defined('MOODLE_INTERNAL') || die();

use renderer_base;

class secure extends login implements \templatable {

    /**
     * Generate template context.
     *
     * @param renderer_base $output
     * @return array|\stdClass
     */
    public function export_for_template(renderer_base $output) {

        $blockshtml = $output->blocks('side-pre');

        $parentcontext = parent::export_for_template($output);

        $templatecontext = array_merge($parentcontext, [
            'sidepreblocks' => $blockshtml,
            'hasblocks' => strpos($blockshtml, 'data-block=') !== false,
        ]);

        return $templatecontext;
    }

}
