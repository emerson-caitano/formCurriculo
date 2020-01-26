exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('competencias').del()
    .then(function () {
      // Inserts seed entries
      return knex('competencias').insert([
        {
          descricao: "Montagem e Manutenção de Microcomputador",
          usuario: 1
        }
      ]);
    });
};