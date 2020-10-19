<?php

function renderContact($contact, $number)
{

  return '<tr class="row-clear">
            <td>' . $number . '</td> 
            <td>' . $contact['name'] . '</td>
            <td>' . $contact['subname'] . '</td>
            <td>' . $contact['birthday'] . '</td>
            <td>' . $contact['phone'] . '</td>
            <td>' . renderLinkFavorite((bool)$contact['favorite'], $contact['id']) . '</td>
            <td>
               <a class="edit" href="updated_data.php?id=' . $contact['id'] . '">Изменить</a>
            </td>
            <td>
              <a href="delete_contacts.php?id=' . $contact['id'] . '" class="button-del">Удалить</a>
            </td>
          </tr>';
}

function renderLinkFavorite($isFavorite, $id)
{
  if ($isFavorite) {
    $link = '<a class="favorite" href="favorite_add_contact.php?favorite=0&id=' . $id . '">⭐️</a>';
  } else {
    $link = '<a class="favorite" href="favorite_add_contact.php?favorite=1&id=' . $id . '">☆</a>';
  }
  return $link;
}
