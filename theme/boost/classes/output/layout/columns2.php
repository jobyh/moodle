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

class columns2 extends secure implements \templatable {

    protected function nav_drawer_open() {

        if (isloggedin()) {
            return (get_user_preferences('drawer-open-nav', 'true') == 'true');
        }

        return false;
    }

    protected function extra_classes($navdraweropen = false) {
        $extraclasses = [];

        if ($navdraweropen) {
            $extraclasses[] = 'drawer-open-left';
        }

        return $extraclasses;
    }

    /**
     * Generate template context.
     *
     * @param renderer_base $output
     * @return array|\stdClass
     */
    public function export_for_template(renderer_base $output) {
        global $PAGE;

        $regionmainsettingsmenu = $output->region_main_settings_menu();
        $navdraweropen = $this->nav_drawer_open();

        $parentcontext = parent::export_for_template($output);

        $templatecontext = array_merge($parentcontext, [
            'bodyattributes' => $output->body_attributes($this->extra_classes($navdraweropen)),
            'navdraweropen' => $navdraweropen,
            'regionmainsettingsmenu' => $regionmainsettingsmenu,
            'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
            'flatnavigation' => $PAGE->flatnav,
        ]);

        return $templatecontext;

    }

}
