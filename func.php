<?php

function renderContact($contact)
{

  return '<tr class="row-clear">
            <td>' . $contact['id'] . '</td> 
            <td>' . $contact['name'] . '</td>
            <td>' . $contact['subname'] . '</td>
            <td>' . $contact['birthday'] . '</td>
            <td>' . $contact['phone'] . '</td>
            <td>' . renderFavorite($contact['favorite']) . '</td>
            <td>
              <button name="edit">Править</button>
            </td>
            <td>
              <button class="button-del" value="Удалить контакт">Удалить</button>
            </td>
          </tr>';
}

function renderFavorite($isFavorite)
{
  $checked = '';
  if ($isFavorite) {
    $checked = 'checked';
  }
  return '<div class="checkbox">
            <input id="check" type="checkbox" name="check" value="check"' . $checked . '>
            <label for="check">☆</label>
          </div>';
}
