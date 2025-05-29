<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Article;
use Cake\Http\Exception\NotFoundException;

class ArticlesController extends AppController
{
    public function index()
    {
        $articles = $this->Articles->find('all', [
            'contain' => ['Categories'],
        ]);

        $this->set(compact('articles'));
    }

    public function view(string $id)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Categories'],
        ]);

        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the article.'));
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories'));
    }

    public function edit(string $id)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the article.'));
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories'));
    }

    public function delete(string $id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
