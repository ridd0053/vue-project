<template>
    <div class="conatiner">
        <button class="btn button_color" v-text="text" :type="type"></button>
    </div>
</template>
<style scoped>
        .button_color{
        background-color: #6586aa;
  ;
        border-color: #6586aa  ;
        color: #EEF2F6
    }
        .button_color:hover{
            color: #fff;
            background-color: #5693da;
            border-color: #5693da;
        }
</style>
<script>
export default {
    
    props: [
        'text',
        'type'
    ]
}
</script>