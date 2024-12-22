<script setup>
import { computed } from 'vue'
import TaskItem from './taskItem.vue'

const props = defineProps({
  tasks: {
    type: Array,
    required: true,
  },
})

const emit = defineEmits('edit-Task', 'delete-Task')

const filteredTasks = computed(() => {
  return props.tasks.filter((task) => !task.done)
})

const editTask = (task) => {
  emit('edit-Task', task)
}

const deleteTask = (taskId) => {
  emit('delete-Task', taskId)
}
</script>

<template>
  <q-layout view="lHh Lpr lFf">
    <q-page-container class="q-pa-none">
      <section class="q-pa-md flex justify-center">
        <q-list class="column list-Tasks">
          <q-item class="q-pa-xs" v-for="task in filteredTasks" :key="task.id">
            <TaskItem :task="task" @save-edit="editTask" @delete-Task="deleteTask" />
          </q-item>
        </q-list>
      </section>
    </q-page-container>
  </q-layout>
</template>

<style scoped>
.list-Tasks {
  gap: 0em;
}
</style>
