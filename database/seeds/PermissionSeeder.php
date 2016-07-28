<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $create_invoice = new Permission();
        $create_invoice->name = 'create_invoice';
        $create_invoice->display_name = 'Create Invoices';
        $create_invoice->description = 'Create new invoices';
        $create_invoice->save();

        $edit_invoice = new Permission();
        $edit_invoice->name = 'edit_invoice';
        $edit_invoice->display_name = 'Edit Invoices';
        $edit_invoice->description = 'Edit new invoices';
        $edit_invoice->save();

        $edit_invoice = new Permission();
        $edit_invoice->name = 'edit_invoice1';
        $edit_invoice->display_name = 'Edit1 Invoices';
        $edit_invoice->description = 'Edit1 new invoices';
        $edit_invoice->save();
    }
}
