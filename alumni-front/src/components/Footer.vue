<template>
    <div class="d-flex justify-center footer">
        <router-link :to="`/about`">
        <p class="white--text mt-1" style="font-size:x-small;">ABOUT</p>
        </router-link>
    </div>
</template>

<script>

export default {
    name: 'Footer',

}
</script>

<style>
.footer {
    height: 50px;
    background-image: url("https://coding-academy-alumni.herokuapp.com/icons/home.jpg");
}

</style>