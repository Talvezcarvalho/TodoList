<script setup>
import { getTasks } from '@/http'
import InserirTarefa from './taskInsert.vue'
import TaskList from './taskList.vue'

import { onMounted, ref } from 'vue'

const tasks = ref([])

onMounted(async () => {
  tasks.value = await getTasks()
})
</script>

<template>
  <section class="taskBody">
    <InserirTarefa />
    <TaskList :tasks="tasks" />
  </section>
</template>

<style scoped>
.taskBody {
  padding: 0.1em 8em;
  margin: auto;
}
</style>
