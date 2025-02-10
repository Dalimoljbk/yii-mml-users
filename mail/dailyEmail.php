<?php
use yii\helpers\Url;
?>
<div style="background: white; color: black; padding: 1em; width: 600px;">
  <p></p>
  <div style="background: #D4DCE8; border-color: #d4dce8; border-style: solid; border-width: 4px 1px 1px; font-family: arial; font-size: 10pt; margin-top: 12px; padding: 10px 20px 20px 20px;">
    <div class="">
      <h2>User Details</h2>
      <?php /******************* left side  ******************* */ ?>
      <div>
        <table style="width: 100%;">
          <tr>
            <td style="vertical-align: top; width: 50%;">
              <span style="font-weight: bold;">Name:</span> <?= $user->name;?>
            </td>
            <td style="vertical-align: top; width: 50%;">
              <span style="font-weight: bold;">Email:</span> <?= $user->email;?>
            </td>
          </tr>
          <tr>
            <td style="vertical-align: top; width: 50%;">
              <span style="font-weight: bold;">Username:</span>  <?= $user->username;?>
            </td>
            <td style="vertical-align: top; width: 50%;">
              <span style="font-weight: bold;">Phone number:</span> <?= $user->phone_number;?>
            </td>
          </tr>
          
        </table>
      </div>
      <div style="margin: 20px 0 0 0; width: 100%;">
       
      </div>
    </div>
  </div>
 
</div>
