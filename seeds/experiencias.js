
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('experiencias').del()
    .then(function () {
      // Inserts seed entries
      return knex('experiencias').insert([
        {
          empresa: "IMB SA",
          cargo: "Auxiliar Administrativo",
          dataInicial: "2010-01-09",
          dataFinal: "2011-11-30",
          localizacao: "Rio de Janeiro",
          funcoes: "Escravo de todos",
          usuario: 1
        }
      ]);
    });
};
