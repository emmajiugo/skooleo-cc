<?php
namespace App\Traits;

use App\AuditLog;

trait AuditLogs
{
    // store audits of user's usage on the platform
    public function storeAudits($email, $action, $payload, $response)
    {
        $audit = new AuditLog;
        $audit->email = $email;
        $audit->action = $action;
        $audit->payload = $payload;
        $audit->response = $response;
        $audit->save();
    }
}
