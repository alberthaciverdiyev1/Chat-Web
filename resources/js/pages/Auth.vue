<template>
    <div>
        <h1>{{ title }}</h1>
        <h2>{{name}}</h2>
        <h3>{{number}}</h3>
        <ul>
            <li v-for="num in array" :key="num">{{num }}</li>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            title: "Auth Page",
            name: "Albert",
            number: "1234567890",
            array: ["a", "b", "c", "d", "e"],
        }
    }
}
</script>
