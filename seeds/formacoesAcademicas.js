
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('formacoesAcademicas').del()
    .then(function () {
      // Inserts seed entries
      return knex('formacoesAcademicas').insert([
        {


        }
      ]);
    });
};
