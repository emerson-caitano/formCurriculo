exports.seed = function(knex) {
    // Deletes ALL existing entries
    return knex('contatos').del()
    .then(function () {
        // Inserts seed entries
        return knex('contatos').insert([
            {
            email: "joao@mail.com",
            celular: "21999999999",
            whatsapp: "21999999999",
            linkedin: "emersoncaitano1234",
            github: "emersoncaitano",
            telegram: "21999999999",
            usuario: 1
            }
        ]);
    });
};