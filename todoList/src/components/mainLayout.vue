<script setup>
import { createTask, deleteTaskById, getTasks, updateTask } from '@/http'
import InserirTarefa from './taskInsert.vue'
import TaskList from './taskList.vue'

import { onMounted, ref } from 'vue'

const tasks = ref([])

onMounted(async () => {
  tasks.value = await getTasks()
})

const insertTask = async (task) => {
  const newTask = await createTask(task)
  if (newTask) {
    tasks.value.push(newTask)
  }
}

const editTask = async (task) => {
  const editedTask = await updateTask(task)
  tasks.value = tasks.value.map((t) => (t.id === editedTask.id ? editedTask : t))
}

const deletedTask = async (taskId) => {
  console.log(taskId)
  await deleteTaskById(taskId)
  tasks.value = tasks.value.filter((task) => task.id !== taskId)
  console.log(tasks.value)
}
</script>

<template>
  <section class="taskBody">
    <InserirTarefa @insert-task="insertTask" />
    <TaskList :tasks="tasks" @edit-Task="editTask" @delete-Task="deletedTask" />
  </section>
</template>

<style scoped>
.taskBody {
  padding: 0.1em 8em;
  margin: auto;
}
</style>
