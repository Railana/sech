<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permission = [
            [
                'name' => 'role-list',
                'display_name' => 'Listagem de papeis',
                'description' => 'Listar papeis'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Cadastrar papel',
                'description' => 'Cadastrar novo papel'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Editar papel',
                'description' => 'Editar papel'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Excluir papel',
                'description' => 'Excluir papel'
            ],
            [
                'name' => 'item-list',
                'display_name' => 'Display Item Listing',
                'description' => 'See only Listing Of Item'
            ],
            [
                'name' => 'item-create',
                'display_name' => 'Create Item',
                'description' => 'Create New Item'
            ],
            [
                'name' => 'item-edit',
                'display_name' => 'Edit Item',
                'description' => 'Edit Item'
            ],
            [
                'name' => 'item-delete',
                'display_name' => 'Delete Item',
                'description' => 'Delete Item'
            ],
            [
                'name' => 'gestao_periodo_letivo-list',
                'display_name' => 'Listagem dos períodos letivos',
                'description' => 'Listar períodos letivos'
            ],
            [
                'name' => 'gestao_periodo_letivo-create',
                'display_name' => 'Cadastrar período letivo',
                'description' => 'Cadastrar novo período letivo'
            ],
            [
                'name' => 'gestao_periodo_letivo-edit',
                'display_name' => 'Editar período letivo',
                'description' => 'Editar período letivo'
            ],
            [
                'name' => 'gestao_periodo_letivo-delete',
                'display_name' => 'Excluir período letivo',
                'description' => 'Excluir período letivo'
            ],  
            [
                'name' => 'gestao_usuario-list',
                'display_name' => 'Listagem de usuários',
                'description' => 'Listar usuários'
            ],
            [
                'name' => 'gestao_usuario-create',
                'display_name' => 'Cadastrar usuário',
                'description' => 'Cradastrar novo usuário'
            ],
            [
                'name' => 'gestao_usuario-edit',
                'display_name' => 'Editar usuário',
                'description' => 'Editar usuário'
            ],
            [
                'name' => 'gestao_usuario-delete',
                'display_name' => 'Excluir usuário',
                'description' => 'Excluir usuário'
            ],
            
            // Telas iniciais
            
            [
                'name' => 'viewTelaProfessor',
                'display_name' => 'Tela de professor',
                'description' => 'Tela de professor'
            ],
            [
                'name' => 'viewTelaAdministradorDoSistema',
                'display_name' => 'Tela de administrador do sistema',
                'description' => 'Tela de administrador do sistema'
            ],
            [
                'name' => 'relatorioUsuario',
                'display_name' => 'Gerar relatório de usuários',
                'description' => 'Gerar relatório de usuários'
            ],
            
            //Especialidade
            ['name' => 'especialidade-list',
                'display_name' => 'Listagem de especialidades',
                'description' => 'Listar especialidade'
            ],
            [
                'name' => 'especialidade-create',
                'display_name' => 'Cadastrar especialidade',
                'description' => 'Cadastrar nova especialidade'
            ],
            [
                'name' => 'especialidade-edit',
                'display_name' => 'Editar especialidade',
                'description' => 'Editar especialidade existente'
            ],
            [
                'name' => 'especialidade-delete',
                'display_name' => 'Excluir especialidade',
                'description' => 'Delete especialidade'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }

}
