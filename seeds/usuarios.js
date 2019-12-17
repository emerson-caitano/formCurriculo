
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('usuarios').del()
    .then(function () {
      // Inserts seed entries
      return knex('usuarios').insert([
        {
          usuario: "1",
          email: "jaoo@email.com",
          password: "12345",
        }
      ]);
    });
};
