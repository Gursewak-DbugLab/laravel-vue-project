<script setup>
// import {DotsHorizontalIcon, PencilIcon, PlusIcon} from "@heroicons/vue/solid";
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import Authenticated from "@/Layouts/Authenticated.vue";
import BoardNameForm from "@/Pages/Boards/BoardNameForm.vue";
import CardListCreateForm from "@/Pages/Boards/CardListCreateForm.vue";
import CardList from "@/Pages/Boards/CardList.vue";

const props = defineProps({
  board: Object,
});
</script>

<template>
  <Authenticated>
    <div class="flex flex-col h-screen bg-red-600">
      <main class="flex-1 overflow-hidden">
        <div class="flex flex-col h-full">
          <div class="flex flex-wrap items-center justify-between p-4 shrink-0">
            <BoardNameForm :board="board" />
            <div>
              <button
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white rounded-md bg white/10 hover: bg-white/20"
              >
                <DotsHorizontalIcon class="w-5 h-5" />
                <span class="ml-1"> Settings </span>
              </button>
            </div>
          </div>
          <div class="flex-1 overflow-x-auto">
            <div class="inline-flex items-start h-full px-4 pb-4 space-x-4">
              <CardList
                v-for="list in board.lists"
                :key="list.id"
                :list="list"
                class="flex flex-col max-h-full bg-gray-200 rounded-md w-72"
              >
              </CardList>
              <div class="w-72">
                <CardListCreateForm :board="board" />
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </Authenticated>
</template>
