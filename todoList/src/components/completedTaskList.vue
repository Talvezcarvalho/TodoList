<script setup>
import { computed } from 'vue'
import TaskItem from './taskItem.vue'

const props = defineProps({
  tasks: {
    type: Array,
    required: true,
  },
})

const emit = defineEmits('changeStatus-Task')

const filteredTasks = computed(() => {
  return props.tasks.filter((task) => task.done)
})

const changeStatusTask = (taskId) => {
  emit('changeStatus-Task', taskId)
}
</script>

<template>
  <q-layout view="lHh Lpr lFf">
    <h1 class="title">Completed tasks</h1>
    <q-page-container class="q-pa-none">
      <q-page class="q-pa-md flex justify-center">
        <q-list class="column list-Tasks">
          <q-item class="q-pa-xs" v-for="task in filteredTasks" :key="task.id">
            <TaskItem :task="task" @changeStatus-Task="changeStatusTask" />
          </q-item>
        </q-list>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<style scoped>
.title {
  text-align: center;
  margin-top: 20px;
  font-size: 2em;
  font-weight: bold;
}
</style>
