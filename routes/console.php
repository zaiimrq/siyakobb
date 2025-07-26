<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:update-item-to-lelang')->everyTwoSeconds();
