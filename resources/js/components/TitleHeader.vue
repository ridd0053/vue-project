<template>
    <div>
    <header class="header row">
            <h1 class="title offset-1">Plan it</h1>
            <h2 v-text="text" class="title offset-5"></h2>
          
    </header>
    </div>
</template>

<script>
export default {
       props: [
        'text'
        
    ]

}
</script>
<style scoped>
    .header{
        background: #333;
        color: #fff;
        text-align: center;
        padding: 15px;
             
    }
    .header h1 {
        color: #fff;
        padding-right: 5px;
    }
    .header_input{
        width: 250px;
        height: 35px;
        
    }

</style>