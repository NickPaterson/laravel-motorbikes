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
                          <th scope="col" class="p-4">
                              <div class="flex items-center">
                                  <input id="checkbox-all" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="checkbox-all" class="sr-only">checkbox</label>
                              </div>
                          </th>
                          <th scope="col" class="px-4 py-3">Users</th>
                          <th scope="col" class="px-4 py-3">Role</th>
                          <th scope="col" class="px-4 py-3">Listings</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                          <td class="w-4 px-4 py-3">
                              <div class="flex items-center">
                                  <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                              </div>
                          </td>
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

                    @endforeach
                  </tbody>
              </table>
          </div>

      </div>
  </div>
</section>

</x-app-layout>