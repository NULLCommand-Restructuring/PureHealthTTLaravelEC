<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ScriptService
{
    public function getAdminMiniLink()
    {
        $getScript = DB::table('chatscript')->first();
        return $getScript->adminminilink;
    }

    public function getPoeLink()
    {
        $getScript = DB::table('chatscript')->first();
        return $getScript->poelink;
    }

    public function getChatBoxLink()
    {
        $getScript = DB::table('chatscript')->first();
        return $getScript->chatboxlink;
    }

    public function getCustomerMiniLink()
    {
        $getScript = DB::table('chatscript')->first();
        return $getScript->minilink;
    }
}
