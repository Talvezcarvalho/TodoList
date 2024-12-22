<script setup>
import { createTask, deleteTaskById, getTasks, updateTask } from '@/http'
import InserirTarefa from './taskInsert.vue'
import TaskList from './taskList.vue'

import { onMounted, ref } from 'vue'
import CompletedTaskList from './completedTaskList.vue'

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
}

const changeStatusTask = async (taskId) => {
  const task = tasks.value.find((task) => task.id === taskId)
  task.done = !task.done
  const editedTask = await updateTask(task)
  tasks.value = tasks.value.map((t) => (t.id === editedTask.id ? editedTask : t))
}
</script>

<template>
  <q-page-container class="taskBody">
    <InserirTarefa @insert-task="insertTask" />
    <TaskList
      :tasks="tasks"
      @edit-Task="editTask"
      @delete-Task="deletedTask"
      @changeStatus-Task="changeStatusTask"
    />
  </q-page-container>
  <CompletedTaskList :tasks="tasks" @changeStatus-Task="changeStatusTask" />
</template>

<style scoped>
.taskBody {
  padding: 0.1em 8em;
  margin: auto;
}
</style>
