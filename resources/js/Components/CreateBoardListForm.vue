<script setup>
import { PlusIcon } from "@heroicons/vue/24/outline";
import { useForm } from "@inertiajs/inertia-vue3";
import { nextTick, ref, watch } from "vue";

const props = defineProps({
  board: Object,
});

async function showForm() {
  isShowingForm.value = true;
  await nextTick();
  inputNameRef.value.focus();
}

function onSubmit() {
  form.post(route("boardLists.store", { board: props.board.id }), {
    onSuccess: () => {
      form.reset();
      inputNameRef.value.focus();
    },
  });
}
const form = useForm({
  name: "",
});
const inputNameRef = ref();
const isShowingForm = ref(false);
</script>
<template>
  <form
    v-if="isShowingForm"
    @submit.prevent="onSubmit()"
    class="p-3 bg-gray-200 rounded-md"
  >
    <input
      v-model="form.name"
      ref="inputNameRef"
      class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring-blue-400"
      type="text"
      placeholder="Enter list Name..."
    />
    <div class="mt-2 space-x-2">
      <Button
        type="submit"
        class="px-4 py=2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
        >Add List</Button
      >
      <Button
        type="button"
        @click="isShowingForm = false"
        class="px-4 py=2 text-sm font-medium text-gray-700 hover:text-black rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
        >Cancel</Button
      >
    </div>
  </form>
  <button
    v-if="!isShowingForm"
    @click="showForm()"
    class="flex items-center w-full p-2 text-sm font-medium rounded-md bg-white/10 hover:bg-black/20"
  >
    <PlusIcon class="w-5 h-5" />
    <span> Add Another List </span>
  </button>
</template>
