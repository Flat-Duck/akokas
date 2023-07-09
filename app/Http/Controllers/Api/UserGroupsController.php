<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GroupCollection;

class UserGroupsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $groups = $user
            ->groups()
            ->search($search)
            ->latest()
            ->paginate();

        return new GroupCollection($groups);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Group $group)
    {
        $this->authorize('update', $user);

        $user->groups()->syncWithoutDetaching([$group->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user, Group $group)
    {
        $this->authorize('update', $user);

        $user->groups()->detach($group);

        return response()->noContent();
    }
}
