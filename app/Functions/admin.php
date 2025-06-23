<?php
    // Recursive function to generate <option> tags for category dropdown
    function dequy($data, $selected, $parent = 0, $lv = '') {
        foreach ($data as $val) {
            if ($val['parent'] == $parent) {
                if ($val['id'] == $selected) {
                    echo '<option value="' . $val['id'] . '" selected>' . $lv . $val['name'] . '</option>';
                } else {
                    echo '<option value="' . $val['id'] . '">' . $lv . $val['name'] . '</option>';
                }
                // Recursive call for child categories
                dequy($data, $selected, $val['id'], $lv . '---|');
            }
        }
    }

    // Recursive function to generate category rows in a table
    function dequytable($data, $parent = 0, $lv = '') {
        foreach ($data as $val) {
            if ($val['parent'] == $parent) {
                echo '<tr>';
                echo '<td>' . $lv . $val['name'] . '</td>';

                // Delete button
                echo '<td>
                    <form action="' . route('admin.category.delete', $val['id']) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this category?\');" style="display:inline;">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>';

                // Edit button
                echo '<td>
                    <a href="' . route('admin.category.edit', $val['id']) . '" class="btn btn-primary btn-sm">Edit</a>
                </td>';

                echo '</tr>';

                // Recursive call for child categories
                dequytable($data, $val['id'], $lv . '---| ');
            }
        }
    }
?>
