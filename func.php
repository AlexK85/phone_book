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
              <a href="delete_contacts.php?id=' . $contact['id'] . '" class="button-del">Удалить</a>
            </td>
          </tr>';
}

function renderFavorite($isFavorite)
{
  $checked = '';
  if ($isFavorite) {
    $checked = 'checked';
  }
  return '<a href="favorite_add_contact.php?favorite=1">
            <div class="checkbox">
              <input id="check" type="checkbox" name="check" value="check"' . $checked . '>
              <label for="check">☆</label>
            </div>
          </a>';
}
