<?php

namespace App\Livewire\Web\Dashboard;

use Aaran\Entries\Models\Purchase;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Product;
use Aaran\Transaction\Models\Transaction;
use App\Helper\ConvertTo;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.web.dashboard.index');
    }
}
