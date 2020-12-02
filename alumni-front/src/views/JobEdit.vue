<template>
    <div class="Job">
        <h1>Hello from Job Edit</h1>
        <ListJobsEdit />
    </div>
</template>

<script>
import ListJobsEdit from "@/components/JobComponents/ListJobsEdit.vue"

export default {
    props:['job'],

    name: 'JobEdit',

    components: {
        ListJobsEdit,
    },

}
</script>
