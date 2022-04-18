<?php
                    $mess=$_GET["mess"] ?? null;
                    if($mess=="deleted"):{?>
                    <div class="alert alert-danger mt-3" id="success-alert">Record Deleted Succesfully</div>
                    <?php } endif;?>
                    <?php if($mess=="added"):{?>
                        <div class="alert alert-success mt-3" id="success-alert">Record added Succesfully</div>
                    <?php } endif;?>
                    <?php if($mess=="updated"):{?>
                        <div class="alert alert-warning mt-3" id="success-alert">Record updated Succesfully</div>
                    <?php } endif;?>
                    <?php if($mess=="uadd"):{?>
                        <div class="alert alert-success mt-3" id="success-alert">User Account Created</div>
                    <?php } endif;?>
                    <?php if($mess=="login"):{?>
                        <div class="alert alert-danger mt-3" id="success-alert">Please Login First</div>
                    <?php } endif;?>
                    <?php if($mess=="saved"):{?>
                        <div class="alert alert-success mt-3" id="success-alert">Drugs Adminstered Successfully</div>
                    <?php } endif;?>