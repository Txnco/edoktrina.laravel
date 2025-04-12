<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminDashboardController extends Controller
{
    public function showAdminDashboard() {
        $now = Carbon::now();
    
        $userCount = User::count();
    
        $currentMonthUsers = User::whereYear('created_at', $now->year)
                                 ->whereMonth('created_at', $now->month)
                                 ->count();
    
        $lastMonthUsers = User::whereYear('created_at', $now->copy()->subMonth()->year)
                              ->whereMonth('created_at', $now->copy()->subMonth()->month)
                              ->count();
    
        $userCountChange = $this->calculateUserGrowthPercentage($currentMonthUsers, $lastMonthUsers);
    
        return view('admin.dashboard', compact('userCount', 'userCountChange'));
    }
    
    public function showUsers() {
        $users = User::select(['id', 'username', 'first_name', 'last_name', 'email', 'created_at'])->latest()->paginate(10);

        return view('admin.users', compact('users'));
    }

    public function showRolesPermissions() {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.roles-permissions', compact('roles', 'permissions'));
    }

    private function calculateUserGrowthPercentage($currentMonthUsers, $lastMonthUsers) {
        if ($lastMonthUsers == 0) {
            return $currentMonthUsers > 0 ? '+100%' : '0%';
        }
    
        return round((($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100, 1) . '%';
    }

  

}
