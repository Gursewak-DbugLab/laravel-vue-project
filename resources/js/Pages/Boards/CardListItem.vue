<script setup>
import { PencilIcon } from "@heroicons/vue/24/outline";
import { computed, nextTick, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { store } from "@/store";

const props = defineProps({
  card: Object,
});

const inputTitleRef = ref();
const isShowingForm = computed(
  () => props.card.id === store.value.editingCardId
);
const form = useForm({
  title: props.card.title,
});

async function showForm() {
  store.value.editingCardId = props.card.id;
  await nextTick();
  inputTitleRef.value.focus();
}

function onSubmit() {
  form.put(route("cards.update", { card: props.card.id }), {
    onSuccess: () => (store.value.editingCardId = null),
  });
}
</script>

<template>
  <li>
    <div
      class="relative p-2 bg-white border-b border-gray-300 rounded-md shadow group hover:bg-gray-50"
    >
      <form
        v-if="isShowingForm"
        @keydown.esc="store.editingCardId = null"
        @submit.prevent="onSubmit()"
      >
        <textarea
          ref="inputTitleRef"
          v-model="form.title"
          class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring-blue-400"
          placeholder="Enter card title..."
          rows="3"
          @keydown.enter.prevent="onSubmit()"
        ></textarea>

        <div class="mt-2 space-x-2">
          <button
            class="px-4 py-2 text-sm font-medium text-white rounded-md shadow-sm bg-rose-600 hover:bg-rose-500 focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
            type="submit"
          >
            Save card
          </button>
          <button
            class="px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-black focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
            type="button"
            @click="store.editingCardId = null"
          >
            Cancel
          </button>
        </div>
      </form>

      <template v-if="!isShowingForm">
        <a class="text-sm" href="#">{{ card.title }}</a>

        <button
          class="absolute hidden w-8 h-8 text-gray-600 rounded-md top-1 right-1 bg-gray-50 group-hover:grid place-content-center hover:text-black hover:bg-gray-200"
          @click="showForm()"
        >
          <PencilIcon class="w-5 h-5" />
        </button>
      </template>
    </div>
  </li>
</template>

<style scoped>
.drag > div {
  transform: rotate(5deg);
}

.ghost {
  background: lightgray;
  border-radius: 6px;
}
.ghost > div {
  visibility: hidden;
}
</style>
