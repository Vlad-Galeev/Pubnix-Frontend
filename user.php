<?php
use myPHPnotes\Microsoft\Models\User;

$user = (new User); // User get pulled only if access token was generated for scope User.Read
echo $user->data->getGivenName();
echo $user->data->getOnPremisesImmutableId();