<template>
    <div class="list-group">
        <div
            class="list-group-item list-group-item-action"
            v-for="listItem in listItems"
        >
            <p>
                {{ listItem.quantity }}x {{ listItem.name }} von
                {{ listItem.user.name }}
            </p>
            <p>Preis:{{ listItem.price }} €</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["listItems"]
};
</script>
