<script setup>
import { PlusIcon } from "@heroicons/vue/24/outline";
import { useForm } from "@inertiajs/inertia-vue3";
import { nextTick, ref, watch } from "vue";
import { store } from "@/store";

const props = defineProps({
  list: Object,
});

const emit = defineEmits(["created"]);

async function showForm() {
  store.value.listCreatingCardId = props.list.id;
  await nextTick();
  inputNameRef.value.focus();
}

function onSubmit() {
  form.post(route("cards.store"), {
    onSuccess: () => {
      form.reset();
      inputNameRef.value.focus();
      emit("created");
    },
  });
}
const form = useForm({
  title: "",
  card_list_id: props.list.id,
  board_id: props.list.board_id,
});
const inputNameRef = ref();
const isShowingForm = computed(
  () => props.list.id === store.value.listCreatingCardId
);
</script>
<template>
  <form
    @keydown.esc="isShowingForm = false"
    v-if="isShowingForm"
    @submit.prevent="onSubmit()"
  >
    <textarea
      v-model="form.title"
      ref="inputNameRef"
      rows="3"
      @keydown.enter.prevent="onSubmit()"
      class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring-blue-400"
      placeholder="Enter Card Title..."
    ></textarea>
    <div class="mt-2 space-x-2">
      <Button
        type="submit"
        class="px-4 py=2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
        >Add Card</Button
      >
      <Button
        type="button"
        @click="store.listCreatingCardId = null"
        class="px-4 py=2 text-sm font-medium text-gray-700 hover:text-black rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
        >Cancel</Button
      >
    </div>
  </form>

  <button
    v-if="!isShowingForm"
    @click="showForm()"
    class="flex w-full p-2 text-sm font-medium text-gray-600 rounded-md item-center hover:text-black hover:bg-gray-300"
  >
    <PlusIcon class="w-5 h-5"> </PlusIcon>
    <Span class="ml-1"> Add Card </Span>
  </button>
</template>
