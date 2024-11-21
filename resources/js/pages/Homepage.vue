<script>
</script>

<template>
    <v-container class="mt-5">
        <v-row justify="center">
            <v-card
                class="card"
                elevation="5"
            >
                <v-card-title class="card-title">Welcome to User CRUD Application</v-card-title>
                <router-link
                    to="/users"
                    class="text-decoration-none text-h6 font-weight-light"
                >
                    <v-btn class="mt-5" color="info">Users</v-btn>
                </router-link>
            </v-card>
        </v-row>
    </v-container>
</template>

<style scoped>
.card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    width: 500px;
    height: 200px;
}

.card {
    transition: color 0.3s;
}

.card:hover {
    color: #2196F3;
}
</style>
