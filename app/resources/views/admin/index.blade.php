<x-app-layout>
<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
  <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
          <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
              <div class="flex items-center flex-1 space-x-4">
                  <h5>
                      <span class="text-gray-500">All Users:</span>
                      <span class="dark:text-white">{{count($users)}}</span>
                  </h5>
              </div>
          </div>
          <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-4 py-3">Username</th>
                          <th scope="col" class="px-4 py-3">Role</th>
                          <th scope="col" class="px-4 py-3">Listings</th>
                          <th scope="col" class="px-4 py-3">New Role</th>
                          <th scope="col" class="px-4 py-3">Change Role</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                          <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              {{$user->name}}
                          </th>
                          <td class="px-4 py-2">
                              @if ($user->is_admin)   Adminstrator
                              @elseif ($user->is_mod)  Moderator
                              @else  User
                              @endif
                          </td>
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <div class="flex items-center">
                                  {{ count($user->motorbikes) }} Motorbikes
                              </div>
                          </td>
                            <form action="{{ route('upgrade.user', $user) }}" method="POST">
                                @csrf
                                <td>
                                    <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="user" >User</option>
                                        <option value="mod" @if ($user->is_mod) selected @endif>Moderator</option>
                                        <option value="admin" @if ($user->is_admin) selected @endif>Administrator</option>
                                    </select>
                                </td>
                                <td>
                                 <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-1 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Upgrade</button>
                                </td>

                            </form>
                           

                    @endforeach
                  </tbody>
              </table>
          </div>

      </div>
  </div>
</section>

</x-app-layout>