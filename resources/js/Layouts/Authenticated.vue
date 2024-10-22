<script setup>
import { Link } from '@inertiajs/inertia-vue3';

import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import NavLink from '@/Components/NavLink.vue';

</script>
 
<template>
  <div>
    <div class="flex flex-col h-screen">
      <nav class="flex justify-between px-4 py-3 bg-white shrink-0">
        <a :href="route('boards')" class="text-2xl font-black tracking-tight">kanboard</a>
        <div class="flex items-center">
          <NavLink href="#">My boards</NavLink>
 
          <Menu as="div" class="relative z-10 ml-3">
            <MenuButton class="rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
              <img :alt="$page.props.auth.user.name"
                   :src="$page.props.auth.user.avatar_url" class="inline rounded-full h-9 w-9">
            </MenuButton>
 
            <transition
              enter-active-class="transition duration-100 ease-out transform"
              enter-from-class="scale-90 opacity-0"
              enter-to-class="scale-100 opacity-100"
              leave-active-class="transition duration-100 ease-in transform"
              leave-from-class="scale-100 opacity-100"
              leave-to-class="scale-90 opacity-0"
            >
              <MenuItems class="absolute right-0 w-48 mt-2 overflow-hidden origin-top-right bg-white border rounded-md shadow-lg focus:outline-none">
                <MenuItem v-slot="{active}">
                  <a :class="{'bg-gray-100': active}" class="block px-4 py-2 text-sm text-gray-700" href="#">My Profile</a>
                </MenuItem>
                <MenuItem v-slot="{active}">
                  <Link :class="{'bg-gray-100': active}"
                        :href="route('logout')" as="button" class="block w-full px-4 py-2 text-sm text-left text-gray-700"
                        method="post">Log out
                  </Link>
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
        </div>
      </nav>
 
      <header class="flex justify-between px-4 py-3 bg-white shrink-0">
        <a class="font-black tracking-tight text 2xl" href="/"> Boards</a>
        <nav class="flex items-center">
          <a
            class="px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-50"
            href="#"
            >My Boards</a
          >
          <Menu as="div" class="relative z-10 ml-3">
            <MenuButton
              class="rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600"
            >
              <img
                class="inline rounded-full h-9 w-9"
                src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
              />
            </MenuButton>

            <transition
              enter-active-class="transition duration-100 ease-out transform"
              enter-from-class="scale-90 opacity-0"
              enter-to-class="scale-100 opacity-100"
              leave-active-class="transition duration-100 ease-in transform"
              leave-from-class="scale-100 opacity-100"
              leave-to-class="scale-90 opacity-0"
            >
              <MenuItems
                class="absolute right-0 w-48 mt-2 overflow-hidden origin-top-right bg-white border rounded-md shadow-lg focus:outline-none"
              >
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="{ 'bg-gray-100': active }"
                    class="block px-4 py-2 text-sm text-gray-700"
                    >My Profile</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="{ 'bg-gray-100': active }"
                    class="block px-4 py-2 text-sm text-gray-700"
                    >Log out</a
                  >
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
        </nav>
      </header>
      <main class="flex-1 overflow-hidden">
        <slot/>
      </main>
    </div>
  </div>
</template>